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
/**
 *Class that display menu item to manage the Themes
 */
class hfnuthemesadminmenuListener extends jEventListener{
    /**
    * the menu item
    * @param object $event
    * @return void
    */
     function onmasteradminGetMenuContent ($event) {
       if ( jAcl2::check('hfnu.admin.themes'))    {
          $event->add(new masterAdminMenuItem('hfnuthemes',jLocale::get('hfnuthemes~theme.themes'), '', 30));
          $item = new masterAdminMenuItem('theme',
                                               jLocale::get('hfnuthemes~theme.themes'),
                                               jUrl::get('hfnuthemes~default:index'),
                                               10,
                                               'hfnuthemes');
           $item->icon = \jUrl::get('jelix~www:getfile', array('targetmodule' => 'hfnuthemes', 'file' => 'theme_icon.png'));
          $event->add($item);
       }

    }
}

