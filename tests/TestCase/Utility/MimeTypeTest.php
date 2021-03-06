<?php

/**
 * Copyright (c) Florian Krämer (https://florian-kraemer.net)
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Florian Krämer (https://florian-kraemer.net)
 * @author    Florian Krämer
 * @link      https://github.com/Phauthentic
 * @license   https://opensource.org/licenses/MIT MIT License
 */

declare(strict_types=1);

namespace Phauthentic\Test\TestCase\Utility;

use Phauthentic\Infrastructure\Storage\Utility\MimeType;
use Phauthentic\Test\TestCase\TestCase;

/**
 * MimeTypeTest
 */
class MimeTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testMimeType(): void
    {
        $this->assertEquals(
            'image/jpeg',
            MimeType::byExtension('jpg')
        );

        $this->assertEquals(
            'image/jpeg',
            MimeType::byFilename('titus.jpg')
        );

        MimeType::addMimeTypeToMap('funky', 'funky/type');
        $this->assertEquals(
            'funky/type',
            MimeType::byExtension('funky')
        );

        $content = file_get_contents($this->getFixtureFile('titus.jpg'));
        $this->assertEquals(
            'image/jpeg',
            MimeType::byContent($content)
        );

        $result = MimeType::getExtensionToMimeTypeMap();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
