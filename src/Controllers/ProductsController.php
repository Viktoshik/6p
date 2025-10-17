<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ProductsController extends Controller
{
    public function index(
        RequestInterface  $request,
        ResponseInterface $response,
    )
    {
        $products = ORM::forTable('products')->findMany();
        return $this->renderer->render($response, 'products/index.php', [
            'products' => $products,
        ]);
    }

    public function create(
        RequestInterface  $request,
        ResponseInterface $response,
    )
    {
        $categories = ORM::forTable('categories')->findMany();
        return $this->renderer->render($response, 'products/create.php', [
            'categories' => $categories,
        ]);
    }

    public function store(
        RequestInterface  $request,
        ResponseInterface $response,
    )
    {
        ORM::forTable('products')->create([
            'name' => $request->getParsedBody()['name'],
            'category_id' => $request->getParsedBody()['category_id'],
            'price' => $request->getParsedBody()['price'],
        ])->save();

        return $response->withStatus(302)->withHeader('Location', '/products');
    }
    public function edit(
        RequestInterface  $request,
        ResponseInterface $response,
        array $args
    )
    {
        $id = $args['id'];
        $product = ORM::forTable('products')->findOne($id);
        $categories = ORM::forTable('categories')->findMany();
        return $this->renderer->render($response, 'products/edit.php', [
            'product' => $product,
            'categories' => $categories,
        ]);

    }
    public function update(
        RequestInterface  $request,
        ResponseInterface $response,
        array $args
    )
    {
        $id = $args['id'];
        ORM::forTable('products')->findOne($id)->set([
            'name' => $request->getParsedBody()['name'],
            'category_id' => $request->getParsedBody()['category_id'],
            'price' => $request->getParsedBody()['price'],
        ])->save();

        return $response->withStatus(302)->withHeader('Location', '/products');
    }
    public function delete(
        RequestInterface  $request,
        ResponseInterface $response,
        array $args
    )
    {
        $id = $args['id'];
        ORM::forTable('products')->findOne($id)->delete();
        return $response->withStatus(302)->withHeader('Location', '/products');
    }
}