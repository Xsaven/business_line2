<?php

namespace App\LteAdmin\Controllers;

use App\Models\Setting;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Card;
use Lar\LteAdmin\Segments\Tagable\Field;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * SettingsController Class.
 * @method Setting model()
 */
class SettingsController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Setting::class;

    /**
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table, Card $card) {
            $card->defaultTools(function ($type) {
                if ($type == 'add' && ! admin()->isRoot()) {
                    return false;
                }

                return true;
            });
            $table->search->id();
            $table->search->input('name', 'Название');
            $table->search->input('value', 'Значение');
            $table->search->at();

            $table->column('ID', 'id')->sort('id');
            $table->column('Системное название', 'name')->sort('name')->copied();
            $table->column('Название', 'info')->sort('name');
            $table->column('Значение', 'value')->sort('value')
                ->to_string()->str_limit(200);
            $table->at();
            $table->controlDelete(admin()->isRoot());
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {
        return Matrix::create(function (Form $form, Card $card) {
            $card->defaultTools(function ($type) {
                if ($type == 'delete' && ! admin()->isRoot()) {
                    return false;
                } elseif ($type == 'add' && ! admin()->isRoot()) {
                    return false;
                }

                return true;
            });
            $form->info_id();
            if (admin()->isRoot()) {
                $form->input('name', 'Название')->required();
                $form->select('field', 'Поле')
                    ->options(
                        collect(array_keys(Field::$form_components))
                            ->mapWithKeys(fn ($i) => [$i => ucfirst(\Str::camel($i))])
                    );
                $form->input('info', 'Информация');
            } else {
                $form->info('name', 'Название');
            }
            if ($this->isType('edit')) {
                $field = $form->{$this->model()->field ?? 'input'}('value', 'Значение')
                    ->value($this->model()->value);
                if ($this->model()->info) {
                    $field->info($this->model()->info);
                }
            }
            $form->info_at();
        });
    }

    /**
     * @return Info
     */
    public function show()
    {
        return Info::create(function (ModelInfoTable $table, Card $card) {
            $card->defaultTools(function ($type) {
                if ($type == 'delete' && ! admin()->isRoot()) {
                    return false;
                } elseif ($type == 'add' && ! admin()->isRoot()) {
                    return false;
                }

                return true;
            });
            $table->id();
            $table->row('Name', 'name');
            $table->row('Value', 'value')->to_string();
            $table->at();
        });
    }
}
