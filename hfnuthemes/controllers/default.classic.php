<?php
/**
* @package   havefnubb
* @subpackage hfnuthemes
* @author    FoxMaSk
* @contributor Laurent Jouanneau
* @copyright 2008-2011 FoxMaSk, 2019-2021 Laurent Jouanneau
* @link      https://havefnubb.jelix.org
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

use Jelix\IniFile\IniModifier;

/**
 * Controller that manage the Theme Manager
 */
class defaultCtrl extends jController {
    /**
     * @var $pluginParams plugins to manage the behavior of the controller
     */
    public $pluginParams = array(
        '*'	=>	array (
            'auth.required'=>true,
            'banuser.check'=>true,
            'jacl2.right'=>'hfnu.admin.themes'
        ),
    );
    /**
     * Index that will display all the available theme to be used
     */
    function index() {
        $tpl = new jTpl();
        $themes = jClasses::getService('themes');
        $lists = $themes->lists();
        $tpl->assign('themes',$lists);
        $tpl->assign('lang',jApp::config()->locale);
        $tpl->assign('current_theme',strtolower(jApp::config()->theme));
        $rep = $this->getResponse('html');
        $rep->body->assign('MAIN',$tpl->fetch('theme'));
        $rep->body->assign('selectedMenuItem','theme');
        return $rep;
    }
    /**
     * Let use one of the available theme
     */
    function useit() {
        $theme = (string) $this->param('theme');
        $mainConfig = new IniModifier(jApp::varConfigPath() . 'liveconfig.ini.php');
        $mainConfig->setValue('theme',strtolower($theme));
        $mainConfig->setValue('datepicker',strtolower($theme),'forms');
        $mainConfig->save();
        jFile::removeDir(jApp::tempPath(), false);
        jMessage::add(jLocale::get('theme.selected'),'information');
        $rep = $this->getResponse('redirect');
        $rep->action = 'default:index';
        return $rep;
    }
}
