<?php


try {
    error_reporting(E_ALL);

    if (!isset($_GET['_url'])) {
        $_GET['_url'] = '/';
    }

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../application/controllers/',
        '../application/models/'
    ));

    $loader->registerNamespaces([
        'AE\Stdlib' => '/var/www/api/application/library/php-stdlib/',
        'AE\User' => '/var/www/api/application/library/ae-user/'
    ]);

    $loader->register();

    if (!empty($_SERVER['REQUEST_URI'])) {
        $pathInfo = $_SERVER['REQUEST_URI'];
    } else {
        $pathInfo = '/';
    }

    $di = new Phalcon\DI\FactoryDefault();

    $di->set('url', function(){
        $url = new Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        return $url;
    });

    $di->set('router', function() {
        $router = new \Phalcon\Mvc\Router();
        $router->setUriSource('/');
        return $router;
    });


    if (!empty($_SERVER['REQUEST_URI'])) {
        $pathInfo = $_SERVER['REQUEST_URI'];
    } else {
        $pathInfo = '/';
    }


    //    CUSTOM DEPENDENCY INJECTION
    require_once(__DIR__ . '/../application/config/Di.php');

    //Handle the request
    $app = new \Phalcon\Mvc\Micro($di);

    $app->get('/{endpoint}/{id:[0-9]+}', function ($endpoint, $id) use ($app) {
        $service = $app->getDi()->get($endpoint . 'Service');
        $entity = $service->fetch($id);

        $response = new \Phalcon\Http\Response();
        $response->setStatusCode(200, "OK");
        $response->setContent(json_encode($entity));

        return $response;
    });

    $app->post('/{endpoint}/filter', function ($endpoint) use ($app) {
        $endpointService = $app->getDi()->get($endpoint . 'Service');
        $postData = json_decode($app->request->getRawBody(), true);

        $filter = $app->getDi()->get($endpoint . 'FilterMapper')->fromArray($postData['filter']);

        $collection = $endpointService->fetchCollectionPaginationFilters($filter);

        $jsonData = [];
        foreach($collection as $item) {
            $jsonData[] = $item->toArray();
        }

        $response = new \Phalcon\Http\Response();
        $response->setStatusCode(200, "OK");
        $response->setContent(json_encode($collection));

        return $response;
    });

    $app->post('/{endpoint}', function ($endpoint) use ($app) {
        $endpointService = $app->getDi()->get($endpoint . 'Service');
        $postData = json_decode($app->request->getRawBody(), true);
        $entity = $app->getDi()->get($endpoint . 'Mapper')->fromArray($postData);

        $savedEntity = $endpointService->save($entity);

        $response = new \Phalcon\Http\Response();
        $response->setStatusCode(200, "OK");
        $response->setContent(json_encode($savedEntity));

        return $response;
    });

    $app->notFound(function () use ($app) {
        $app->response->setStatusCode(404, "Not Found")->sendHeaders();
        echo 'This is crazy, but this page was not found!' . $_SERVER['REQUEST_URI'];
    });

    $app->handle();

} catch(\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
    echo "\n --- \n";
    echo "PhalconException: ", $e->getTraceAsString();
} catch(\Exception $e) {
    echo $e->getMessage();
    echo "\n --- \n";
    echo $e->getTraceAsString();
}

