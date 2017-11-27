<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Início', route('home'));
});

// Product List
Breadcrumbs::register('products.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Produtos', route('products.index'));
});

// Product Create
Breadcrumbs::register('products.create', function ($breadcrumbs) {
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Criar', route('products.create'));
});

// Product Show
Breadcrumbs::register('products.show', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Exibir', route('products.show', $route->parameters));
});

// Product Edit
Breadcrumbs::register('products.edit', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Editar', route('products.edit', $route->parameters));
});

// Client List
Breadcrumbs::register('clients.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Clientes', route('clients.index'));
});

// Client Create
Breadcrumbs::register('clients.create', function ($breadcrumbs) {
    $breadcrumbs->parent('clients.index');
    $breadcrumbs->push('Criar', route('clients.create'));
});

// Client Show
Breadcrumbs::register('clients.show', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('clients.index');
    $breadcrumbs->push('Exibir', route('clients.show', $route->parameters));
});

// Client Edit
Breadcrumbs::register('clients.edit', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('clients.index');
    $breadcrumbs->push('Editar', route('clients.edit', $route->parameters));
});

// Rent List
Breadcrumbs::register('rents.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Aluguéis', route('rents.index'));
});

// Rent Create
Breadcrumbs::register('rents.create', function ($breadcrumbs) {
    $breadcrumbs->parent('rents.index');
    $breadcrumbs->push('Criar', route('rents.create'));
});

// Rent Show
Breadcrumbs::register('rents.show', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('rents.index');
    $breadcrumbs->push('Exibir', route('rents.show', $route->parameters));
});

// Rent Edit
Breadcrumbs::register('rents.edit', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('rents.index');
    $breadcrumbs->push('Editar', route('rents.edit', $route->parameters));
});


// Profile List
Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Perfil', route('profile'));
});

// Profile Edit
Breadcrumbs::register('profile.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('Editar', route('profile.edit'));
});

// Address User Create
Breadcrumbs::register('address_user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('Criar', route('address_user.create'));
});

// Address User Show
Breadcrumbs::register('address_user.show', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('Exibir', route('address_user.show', $route->parameters));
});

// Address User Edit
Breadcrumbs::register('address_user.edit', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('Editar', route('address_user.edit', $route->parameters));
});

// Address Client Create
Breadcrumbs::register('address_client.create', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('clients.show', $route);
    $breadcrumbs->push('Criar', route('address_client.create', $route->parameters));
});

// Address Client Show
Breadcrumbs::register('address_client.show', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('clients.show', $route);
    $breadcrumbs->push('Exibir', route('address_client.show', $route->parameters));
});

// Address Client Edit
Breadcrumbs::register('address_client.edit', function ($breadcrumbs, $route) {
    $breadcrumbs->parent('clients.show', $route);
    $breadcrumbs->push('Editar', route('address_client.edit', $route->parameters));
});