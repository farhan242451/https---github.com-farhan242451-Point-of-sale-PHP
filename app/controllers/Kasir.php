<?php

class Kasir extends Controller
{
    public function index($page = 1)
    {
        $limit = 6; // Number of products per page
        $offset = ($page - 1) * $limit;

        $data['title'] = 'Kasir Page';

        // Fetch products with pagination
        $data['products'] = $this->model('Kasir_model')->getProduksWithPagination($limit, $offset);
        $data['totalProducts'] = $this->model('Kasir_model')->getTotalProducts();
        $data['username'] = $_SESSION['username'];

        // Calculate total pages
        $data['totalPages'] = ceil($data['totalProducts'] / $limit);
        $data['currentPage'] = $page;
        // Get current time
        $data['current_time'] = date('H:i:s');

        $userId = $_SESSION['user']['id_user'];
        $data['user'] = $this->model('User_model')->getUserById($userId);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kasir/index', $data);
        $this->view('templates/footer', $data);
    }

    public function processTransaction()
    {
        $customerName = $_POST['customer_name'];
        $paymentMethod = $_POST['payment_method'];
        $uangCustomer = $_POST['uang_customer'];
        $cartData = json_decode($_POST['cart'], true); // Decode JSON cart data
        $totalPrice = $_POST['total_price'];
        

        if ($uangCustomer < $totalPrice) {
            Flasher::setFlash('Transaction', 'Payment insufficient. Please provide enough money.', 'Try Again', 'danger');
            header('Location: ' . BASEURL . '/kasir');
            exit;
        }

        // Ensure customer is added
        $customerId = $this->model('Kasir_model')->insertCustomer($customerName);

        // Insert transaction
        $this->model('Kasir_model')->insertTransaction($customerId, $paymentMethod, $uangCustomer, $totalPrice);

        $idTransaksi = $this->model('Kasir_model')->getLastTransactionId();

        // Insert transaction details
        if (!empty($cartData) && is_array($cartData)) {
            foreach ($cartData as $item) {
                $this->model('Kasir_model')->insertDetailTransaction(
                    $idTransaksi,
                    $item['id'],
                    $item['quantity'],
                    $item['price'],
                    $item['subtotal']
                );
            }
        }

        $uangKembali = $uangCustomer - $totalPrice;
        $data['title'] = 'Receipt';
        $data['transaksi'] = [
            'customer_name' => $customerName,
            'total_price' => $totalPrice,
            'uang_customer' => $uangCustomer,
            'uang_kembali' => $uangKembali,
            'cart' => $cartData
        ];

        $this->view('kasir/receipt', $data);
    }
}
