<?php
/**
 * Bitquick\Pathtastic\Pathtastic.php
 *
 * Method for determining if a specified file or folder exists within another specified parent directory.
 */

    namespace Bitquick\Pathtastic;

    abstract class Pathtastic {

        // The directory that your targetPath must be located in.
        protected $requiredPath;

        // The file or directory that must be in $requiredPath or a subdirectory of $requiredPath
        protected $targetPath;


        public function verifyPath($targetPath = NULL, $requiredPath = NULL) {

            if ( $requiredPath === NULL ) {
                throw new \Exception("You must supply a required path.");
            }

            if ( $targetPath === NULL ) {
                throw new \Exception("You must supply a target path.");
            }


            // Verify the required path exists.
            if ( !$realRequiredPath = realpath($requiredPath) ) {
                return false;
            }

            // Verify the required path is a directory.
            if ( !is_dir($realRequiredPath) ) {
                return false;
            }

            // Verify the target path exists.
            if ( !$realTargetPath = realpath($targetPath) ) {
                return false;
            }

            // Append trailing slash
            $realRequiredPath = self::appendDS($realRequiredPath);

            // Get lengths
            $realTargetPathLength = strlen($realTargetPath);
            $realRequiredPathLength = strlen($realRequiredPath);

            // Compare path lengths
            if ( $realTargetPathLength < $realRequiredPathLength ) {
                // target is shorter in length that required.
                return false;
            }

            if ( strcmp(substr($realTargetPath, 0, $realRequiredPathLength), $realRequiredPath) == 0 ) {
                // Target is in current path
                return true;
            } else {
                // Target path is not in the required path
                return false;
            }
        }

        public function appendDS($path) {
            $lastChar = substr($path, -1);
            if ( $lastChar != "/" && $lastChar != "\\" && $lastChar != DIRECTORY_SEPARATOR ) {
                return $path . DIRECTORY_SEPARATOR;
            }
        }

        static function path2url($fs_enc_url) {
          $encoded_url = str_replace("_", "/", $fs_enc_url);
          $url = base64_decode($encoded_url);
          return $url;
        }
        static function url2path($url) {
          $encoded_url = base64_encode($url);
          $fs_enc_url = str_replace("/", "_", $encoded_url);
          return $fs_enc_url;
        }


    }

?>
