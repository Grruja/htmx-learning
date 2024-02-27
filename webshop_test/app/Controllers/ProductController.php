<?php


namespace App\Controllers;


use App\Models\Product;
use App\Support\Session;

class ProductController extends Controller
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function permalink(array $params = []): void
    {
        if (!isset($params['product_id'])) $this->redirectTo404();
        if (!is_numeric($params['product_id'])) $this->redirectTo404();

        $product = $this->productModel->getSingleProduct($params['product_id']);
        if (!isset($product)) $this->redirectTo404();

        $products = $this->displayNewest();

        require_once __DIR__ . '/../../view/product.php';
    }

    public function create(array $params = []): void
    {
        // validation here
        $imageName = basename($_FILES['image']['name']);
        $this->productModel->saveImage($imageName);
        $imagePath = $this->productModel->imagePathForDb($imageName);

        $this->productModel->create($params, $imagePath);

        Session::start();
        $_SESSION['alert_message']['success'] = 'Product created';
        $this->redirect('/admin');
    }

    public function displayNewest(): array
    {
        return $this->productModel->getNewest();
    }

    public function searchByName(): void
    {
        sleep(3);
        if (!isset($_GET['search_value'])) {
            $products = $this->productModel->getAll();
            $this->renderFragment('/productCard.php', ['products' => $products]);
        }

        $products = $this->productModel->searchByName($_GET['search_value']);

        if (!isset($products)) $this->renderFragment('/notFoundProduct.php');

        $this->renderFragment('/productCard.php', ['products' => $products]);
    }
}