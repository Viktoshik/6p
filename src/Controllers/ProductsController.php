<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ProductsController extends AdminController
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
        $pop = empty($request->getParsedBody()['pop']) ? 0 : 1;
        ORM::forTable('products')->findOne($id)->set([
            'name' => $request->getParsedBody()['name'],
            'category_id' => $request->getParsedBody()['category_id'],
            'price' => $request->getParsedBody()['price'],
            'pop' => $pop,
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
    public function addAttributes(
        RequestInterface  $request,
        ResponseInterface $response,
        array $args
    )
    {
        $id = $args['id'];
        $product = ORM::forTable('products')->findOne($id);
        $attributes = ORM::forTable('attribute_types')->findMany();
        $product_attributes = ORM::forTable('product_attributes')->where('product_id', $id)->findMany();
        return $this->renderer->render($response, 'products/addAttributes.php', [
            'product' => $product,
            'attributes' => $attributes,
            'product_attributes' => $product_attributes,
        ]);
    }
    public function storeAttributes(
        RequestInterface  $request,
        ResponseInterface $response,
        array $args
    )
    {
        $attributeid = $request->getParsedBody()['attribute'];
        ORM::forTable('product_attributes')->create([
            'product_id' => $args['id'],
            'attribute_type_id' => $attributeid,
            'value' => $request->getParsedBody()['value'],
        ])->save();
        return $response->withStatus(302)->withHeader('Location', '/products');
    }
}