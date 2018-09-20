<?php

/*
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\ListYoutubeBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Config\ContainerBuilder;
use Contao\ManagerPlugin\Config\ExtensionPluginInterface;
use HeimrichHannot\ListBundle\HeimrichHannotContaoListBundle;
use HeimrichHannot\ListYoutubeBundle\HeimrichHannotContaoListYoutubeBundle;
use HeimrichHannot\UtilsBundle\Container\ContainerUtil;
use HeimrichHannot\YoutubeBundle\HeimrichHannotContaoYoutubeBundle;

class Plugin implements BundlePluginInterface, ExtensionPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(HeimrichHannotContaoListYoutubeBundle::class)->setLoadAfter([
            	ContaoCoreBundle::class,
				HeimrichHannotContaoListBundle::class,
				HeimrichHannotContaoYoutubeBundle::class
			]),
        ];
    }

    /**
     * Allows a plugin to override extension configuration.
     *
     * @param string           $extensionName
     * @param array            $extensionConfigs
     * @param ContainerBuilder $container
     *
     * @return
     */
    public function getExtensionConfig($extensionName, array $extensionConfigs, ContainerBuilder $container)
    {
		$extensionConfigs = ContainerUtil::mergeConfigFile(
			'huh_list',
			$extensionName,
			$extensionConfigs,
			__DIR__.'/../Resources/config/huh_list.yml'
		);
		return $extensionConfigs;
    }
}
