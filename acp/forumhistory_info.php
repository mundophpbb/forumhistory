<?php
/**
 * Informações do módulo ACP para Forum History.
 * @package mundophpbb/forumhistory
 */
namespace mundophpbb\forumhistory\acp;
class forumhistory_info
{
    public function module()
    {
        return array(
            'filename' => '\mundophpbb\forumhistory\acp\forumhistory_module',
            'title' => 'ACP_FORUMHISTORY_TITLE',
            'modes' => array(
                'settings' => array ( 'title' => 'ACP_FORUMHISTORY_SETTINGS', 'auth' => 'ext_mundophpbb/forumhistory && acl_a_board', 'cat' => array ('ACP_FORUMHISTORY_TITLE')),
            ),
        );
    }
}