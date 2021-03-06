<?php

/**
 * This file is part of the Tmdb PHP API created by Michael Roterman.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Tmdb
 * @author Michael Roterman <michael@wtfz.net>
 * @copyright (c) 2013, Michael Roterman
 * @version 4.0.0
 */

header('Content-Type: text/html; charset=utf-8');

use Tmdb\Repository\MovieRepository;
use Tmdb\Exception\TmdbApiException;

require_once '../vendor/autoload.php';
require_once 'apikey.php';

/** @var Tmdb\Client $client **/
$client = require_once('setup-client.php');
$repository  = new MovieRepository($client);

/**
 * @var \Tmdb\Model\Movie $movie
 */
try {
    $movie = $repository->load(298312000);
} catch (TmdbApiException $e) {
    if (TmdbApiException::STATUS_RESOURCE_NOT_FOUND == $e->getCode()) {
        // not found
        echo $e->getMessage();
        exit;
    }

    // catch other tmdb specific errors
} catch (Exception $e) {
    // catch any other errors
}
