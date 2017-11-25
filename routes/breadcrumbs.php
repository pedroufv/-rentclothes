<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Product List
Breadcrumbs::register('products.index', function ($breadcrumbs) {
    $breadcrumbs->push('Produtos', route('products.index'));
});

// Product Create
Breadcrumbs::register('products.create', function ($breadcrumbs) {
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Produtos', route('products.create'));
});

// Product Show
Breadcrumbs::register('products.show', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Produtos', route('products.show', $product->id));
});

// Product Edit
Breadcrumbs::register('products.edit', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Produtos', route('products.edit', $product->id));
});

// Client List
Breadcrumbs::register('clients.index', function ($breadcrumbs) {
    $breadcrumbs->push('Clientes', route('clients.index'));
});

// Client Create
Breadcrumbs::register('clients.create', function ($breadcrumbs) {
    $breadcrumbs->parent('clients.index');
    $breadcrumbs->push('Clientes', route('clients.create'));
});

// Client Show
Breadcrumbs::register('clients.show', function ($breadcrumbs, $client) {
    $breadcrumbs->parent('clients.index');
    $breadcrumbs->push('Clientes', route('clients.show', $client->id));
});

// Client Edit
Breadcrumbs::register('clients.edit', function ($breadcrumbs, $client) {
    $breadcrumbs->parent('clients.index');
    $breadcrumbs->push('Clientes', route('clients.edit', $client->id));
});