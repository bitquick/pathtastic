<?php
/**
 * tests/PathtasticTest.php
 * 
 * Unit testing for Bitquick\Pathtastic\Pathtastic class.
 */

use Bitquick\Pathtastic\Pathtastic;

class PathtasticTest extends \PHPUnit\Framework\TestCase
{
        /**
         * test access granted
         */
        public function testingAccessGranted() {

            if ( !$documentRoot = $_SERVER['DOCUMENT_ROOT'] ) {
                $documentRoot = getcwd();
            }

            $testPaths = [
                "tests/Bitquick/Pathtastic/PathtasticTest.php",
                "tests/readme.md"

            ];

            foreach($testPaths as $path) {
                $this->assertTrue(Pathtastic::verifyPath($path, $documentRoot));
            }
        }

        /**
         * Test access denied
         */
        public function testingAccessDenied() {

            if ( !$documentRoot = $_SERVER['DOCUMENT_ROOT'] ) {
                $documentRoot = getcwd();
            }

            $testPaths = [
                "docs/../../readme.md",
                "docs/../../../readme.md",
                "../bitquick-pathtastic",
            ];

            foreach($testPaths as $path) {
                $this->assertFalse(Pathtastic::verifyPath($path, $documentRoot));
            }
        }

        /**
         * test empty required path
         */
        public function testingNullRequiredPath() {
            $path = "/";
            $documentRoot = NULL;
            $this->expectException(\Exception::class);
            Pathtastic::verifyPath($path, $documentRoot);
        }

        /**
         * test empty target path
         */
        public function testingNullTargetPath() {
            $path = NULL;
            $documentRoot = "/";
            $this->expectException(\Exception::class);
            Pathtastic::verifyPath($path, $documentRoot);
        }

        /**
         * Testing Root Access
         */
        public function testingRootAccess() {
            $documentRoot = "/";
            $testPaths = [
                getcwd()
            ];

            foreach($testPaths as $path) {
                $this->assertTrue(Pathtastic::verifyPath($path, $documentRoot));
            }
        }


}

?>