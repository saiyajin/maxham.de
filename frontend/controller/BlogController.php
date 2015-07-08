<?php

namespace Frontend\Controller;

use Frontend\Model\Blog;
use Tamarillo\CMS\PageController;

/**
 * Class BlogController
 *
 * @package Frontend\Controller
 * @author Tobias Maxham
 * @generated 17.06.2015
 * @version 17.06.2015
 */
class BlogController extends PageController
{

	public function start()
	{
		if (func_num_args() == 0)
			return view(BLOGVIEW.'.start')->with('page', $this->setPage('blog'));

		$blog = Blog::where('tag', func_get_arg(0))->first();
		if (is_null($blog)) return $this->notFound(func_get_arg(0));
		return view(BLOGVIEW.'.single')->with('blog', $blog)
			->with('page', $this->setPage('blog'));
	}

	private function notFound($key)
	{
		return $this->index($key);
	}

}