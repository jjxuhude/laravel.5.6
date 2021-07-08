<?php
/**
 * Created by PhpStorm.
 * User: Jack.Xu1
 * Date: 2020/5/26
 * Time: 10:07
 */

namespace App\Console\Commands;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

trait Brand
{
    public function configureUsingFluentDefinition()
    {
        parent::configureUsingFluentDefinition();
        //$this->getDefinition()->addArgument($this->_newArgument('brand_code'));
        $this->getDefinition()->addOption($this->_newOption('brand_code'));


    }

    protected function _newOption($code){
        return new InputOption(
            '--'.$code,
            null,
            InputOption::VALUE_REQUIRED,
            $code);

    }

    protected function _newArgument($code){
        return new InputArgument(
            $code,
            InputArgument::OPTIONAL,
            $code
        );
    }


}