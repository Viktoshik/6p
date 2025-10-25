<?php

namespace Src\Controllers;

use Attribute;
use http\Env\Request;
use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AttributeController extends AdminController
{
    public function index(
    RequestInterface $request,
    ResponseInterface $response,
)
    {
        $attributes = ORM::forTable('attribute_types')->findMany();
        return $this->renderer->render($response, 'attributes/index.php', [
        'attributes' => $attributes,
        ]);
    }
    public function create(
        RequestInterface $request,
        ResponseInterface $response,
    )
    {
        return $this->renderer->render($response, 'attributes/create.php');
    }
    public function store(
        RequestInterface $request,
        ResponseInterface $response,
    )
    {
        ORM::forTable('attribute_types')->create([
            'name'=>$request->getParsedBody()['name'],
            'unit' => $request->getParsedBody()['unit'] !== '' ? $request->getParsedBody()['unit'] : null,
        ])->save();
        return $response->withStatus(302)->withHeader('Location', '/attributes');
    }
    public function delete(
        RequestInterface $request,
        ResponseInterface $response,
        array $args
    )
    {
        $id = $args['id'];
        ORM::forTable('attribute_types')->findOne($id)->delete();
        return $response->withStatus(302)->withHeader('Location', '/attributes');
    }
}