<?php

declare(strict_types=1);

namespace Zeiterfassung\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ScannerClientAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('uname')
            ->add('lastOnline')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('uname')
            ->add('location')
            ->add('lastOnline', 'status_datetime')
            ->add('latestLog')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                    'logs' => [
                        'template' => ['@Zeiterfassung/admin/list__action_logs.html.twig']
                        ]
                ],
            ]);
            return;
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('uname')
            ->add('location')
            ->add('lastOnline')
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('uname')
            ->add('location')
            ->add('lastOnline', null, [
                // 'format' => 'Y-m-d H:i',
                'locale' => 'de',
                'timezone' => 'Europe/Berlin',
            ])
            ->add('logsToday')
        ;
    }
}
