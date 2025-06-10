<?php

use App\Models\Employee;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as Trail;

// Dashboard
Breadcrumbs::for('dashboard', function (Trail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Employee Index
Breadcrumbs::for('employee.index', function (Trail $trail) {
    $trail->parent('dashboard');
    $trail->push('Employees', route('employee.index'));
});

// Employee Create
Breadcrumbs::for('employee.create', function (Trail $trail) {
    $trail->parent('employee.index');
    $trail->push('Create', route('employee.create'));
});

// Employee Edit
Breadcrumbs::for('employee.edit', function (Trail $trail, Employee $employee) {
    $trail->parent('employee.index');
    $trail->push('Edit', route('employee.edit', $employee->id));
});

// Visit History Index
Breadcrumbs::for('visit_history.index', function (Trail $trail) {
    $trail->parent('dashboard');
    $trail->push('Visit History', route('visit_history.index'));
});

// Visit History Create
Breadcrumbs::for('visit_history.create', function (Trail $trail) {
    $trail->parent('visit_history.index');
    $trail->push('Create', route('visit_history.create'));
});

// Visit History Edit
Breadcrumbs::for('visit_history.edit', function (Trail $trail, $visit) {
    $trail->parent('visit_history.index');
    $trail->push('Edit', route('visit_history.edit', $visit->id));
});