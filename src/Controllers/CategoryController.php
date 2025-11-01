<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CategoryController extends AdminController
{
    public function index(
        RequestInterface  $request,
        ResponseInterface $response,
    )
    {
        $categories = ORM::forTable('categories')->findMany();
        return $this->renderer->render($response, 'categories/index.php', [
            'categories' => $categories,
        ]);
    }

    public function create(
        RequestInterface  $request,
        ResponseInterface $response,
    )
    {
        $categories = ORM::forTable('categories')->findMany();
        return $this->renderer->render($response, 'categories/create.php', [
            'categories' => $categories,
        ]);
    }

    public function store(
        RequestInterface  $request,
        ResponseInterface $response,
    )
    {
        ORM::forTable('categories')->create([
            'name' => $request->getParsedBody()['name'],
            'parent_id' => $request->getParsedBody()['parent_id'] !== '' ? $request->getParsedBody()['parent_id'] : null,
        ])->save();

        return $response->withStatus(302)->withHeader('Location', '/categories');
    }
    public function edit(
        RequestInterface  $request,
        ResponseInterface $response,
        array $args
    )
    {
        $id = $args['id'];
        $category = ORM::forTable('categories')->findOne($id);
        $parentCategories = ORM::forTable('categories')->findMany();
        return $this->renderer->render($response, 'categories/edit.php', [
            'category' => $category,
            'parentCategories' => $parentCategories,
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
        ORM::forTable('categories')->findOne($id)->set([
            'name' => $request->getParsedBody()['name'],
            'parent_id' => $request->getParsedBody()['parent_id'] !== '' ? $request->getParsedBody()['parent_id'] : null,
            'pop' => $pop,
        ])->save();

        return $response->withStatus(302)->withHeader('Location', '/categories');
    }
    public function delete(
        RequestInterface  $request,
        ResponseInterface $response,
        array $args
    )
    {
        $id = $args['id'];
        ORM::forTable('categories')->findOne($id)->delete();
        return $response->withStatus(302)->withHeader('Location', '/categories');
    }
}