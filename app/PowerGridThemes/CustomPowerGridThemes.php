<?php

namespace App\PowerGridThemes;

use \PowerComponents\LivewirePowerGrid\Themes\Tailwind;
use \PowerComponents\LivewirePowerGrid\Themes\Theme;
use PowerComponents\LivewirePowerGrid\Themes\Components\{Actions, Checkbox, ClickToCopy, Cols, Editable, FilterBoolean, FilterDatePicker, FilterInputText, FilterMultiSelect, FilterNumber, FilterSelect, Footer, Table};

class CustomPowerGridThemes extends Tailwind
{
    public string $name = 'tailwind';

    public function table(): Table
    {
        return Theme::table('w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg overflow-hidden')
            ->thead('text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400')
            ->th('px-6 py-3')
            ->trBody('bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600')
            ->tdBody('px-6 py-4')
            ->tdBodyEmpty('p-4 whitespace-nowrap text-center dark:text-pg-primary-200');
    }
}
