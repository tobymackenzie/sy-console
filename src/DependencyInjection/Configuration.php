<?php
namespace TJM\Component\Console\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface{
	public function getConfigTreeBuilder(){
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('tjm_console');
		$rootNode->children()
			->scalarNode('name')
				->cannotBeOverwritten()
				->isRequired()
			->end()
			->scalarNode('version')
				->cannotBeOverwritten()
				->defaultValue('0.0')
			->end()
			->scalarNode('rootNamespace')
				->defaultValue('')
			->end()
			->arrayNode('commands')
				->prototype('scalar')->end()
			->end()
		->end();
		return $treeBuilder;
	}
}
