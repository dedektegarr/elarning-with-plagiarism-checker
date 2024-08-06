<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class StudentTable extends PowerGridComponent
{
    public $subject;

    public function datasource(): ?Collection
    {
        $users = $this->subject->users->filter(function ($user) {
            return $user->role === 'student';
        });

        return $users;
    }

    public function setUp(): array
    {
        return [
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage()
        ];
    }

    public function noDataLabel(): string|View
    {
        return "Tidak ada mahasiswa";
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('username')
            ->add('name')
            ->add('gender', function ($entry) {
                return $entry->gender === 'male' ? 'Pria' : 'Wanita';
            });
    }

    public function columns(): array
    {
        return [
            Column::make('NPM', 'username')
                ->bodyAttribute('uppercase')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->bodyAttribute('capitalize')
                ->searchable()
                ->sortable(),

            Column::make('Jenis kelamin', 'gender')
                ->sortable(),
        ];
    }
}
