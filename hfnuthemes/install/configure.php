<?php
/**
 * @package     hfnuthemes
 * @author      Laurent Jouanneau
 * @contributor
 * @copyright   2019-2022 Laurent Jouanneau
 * @link      https://havefnubb.jelix.org
 * @license  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
 */

use Jelix\Installer\Module\API\ConfigurationHelpers;
use Jelix\Routing\UrlMapping\EntryPointUrlModifier;
use Jelix\Routing\UrlMapping\MapEntry\MapInclude;

class hfnuthemesModuleConfigurator extends \Jelix\Installer\Module\Configurator {

    public function getDefaultParameters()
    {
        return array(
            'nocopyfiles' => false
        );
    }


    public function declareUrls(EntryPointUrlModifier $registerOnEntryPoint)
    {
        $registerOnEntryPoint->havingName(
            'admin',
            array(
                new MapInclude('urls_admin.xml')
            )
        )
        ;
    }

    public function configure(ConfigurationHelpers $helpers)
    {
        if (!$this->getParameter('nocopyfiles')) {
            $helpers->copyDirectoryContent('css/', 'www:themes/default/css/');

            $helpers->declareGlobalWebAssets('hfnuthemes',
                array(
                    'css' => array(
                        '$theme/css/hfnuthemes.css',
                    ),
                    'js' => array(
                        'hfnuthemes:themes.js'
                    ),
                    'require'=> 'jquery_ui'
                ), 'common', false);
        }
    }
}
