<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function catalog(
        RequestInterface $request,
        ResponseInterface $response
    )
    {
        $categories = ORM::forTable('categories')->whereNull('parent_id')->findMany();
        $products = ORM::forTable('products')->findMany();
        return $this->renderer->render($response, 'catalog.php', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
    public function show(
        RequestInterface $request,
        ResponseInterface $response,
        array $args
    )
    {
        $slug = $args['slug'];
        $category = ORM::forTable('categories')->where('slug', $slug)->find_one();
        $cat = ORM::forTable('categories')->where('parent_id',$category['id'])->findMany();
        $products = ORM::forTable('products')->where('category_id', $category['id'])->findMany();
        return $this->renderer->render($response, 'show.php', [
            'cat' => $cat,
            'products' => $products,
        ]);
    }
    public function index(
        RequestInterface $request,
        ResponseInterface $response
    )
    {
        $categories = ORM::forTable('categories')
            ->findMany();
        $products = ORM::forTable('products')->
            where('pop', 1)
            ->findMany();
        return $this->renderer->render($response, 'index.php', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    public function productshow(
        RequestInterface $request,
        ResponseInterface $response,
        array $args
    )
    {
        $slug = $args['slug'];
        $product = ORM::forTable('products')->where('slug', $slug)->find_one();
        return $this->renderer->render($response, 'product.php', [
            'product' => $product,
        ]);
    }
}