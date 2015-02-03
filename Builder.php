<?php
use Robo\Tasks;
use Fol\Tasks\PageRender;
use Fol\Tasks\PhpRender;
use Fol\Config;

class Builder extends Tasks
{
	use PageRender;
	use PhpRender;

	public function __construct()
	{
		$this->config = new Config('config', 'local');
	}

	/**
	 * Install all npm and bower components
	 */
	public function install()
	{
		//npm
		$this->taskNpmInstall()->run();
	}

	/**
	 * Run a php server
	 */
	public function server()
	{
		echo "server started at http://localhost:8000\n";

		$this->taskServer(8000)
			->dir('dist')
			->run();
	}

	/**
	 * Build the site in ./dist and ./demo
	 */
	public function build()
	{
		//Generate the demo
		$this->taskFilesystemStack()
			->remove('demo')
			->mkdir('demo')
			->run();

		$this->taskPhpRender()
			->render('sources/demo.php', 'demo/index.html')
			->run();

		$this->taskParallelExec()
			->process('node node_modules/.bin/stylecow execute config/stylecow.json -i ../sources/demo.css -o ../demo/styles.css')
			->run();

		//Generate the dist
		$this->taskFilesystemStack()
			->remove('dist')
			->mkdir('dist')
			->run();

		$this->taskParallelExec()
			->process('node node_modules/.bin/stylecow execute config/stylecow.json -i ../sources/icona-12.css -o ../dist/icona-12.css -m ../dist/icona-12.map')
			->process('node node_modules/.bin/stylecow execute config/stylecow.json -i ../sources/icona-16.css -o ../dist/icona-16.css -m ../dist/icona-16.map')
			->run();
	}

	/**
	 * Publish the demo site in my server using rsync
	 * Need to configure the connection in config/local/rsync.php
	 */
	public function publish()
	{
		$this->taskRsync()
			->fromPath('dist/')
			->toPath($this->config['rsync']['path'])
			->recursive()
			->run();
	}
}
