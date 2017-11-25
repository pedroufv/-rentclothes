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