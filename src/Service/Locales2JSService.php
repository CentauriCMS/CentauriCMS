<?php
namespace Centauri\CMS\Service;

class Locales2JSService
{
    public static function getLocalizedArray()
    {
        $locallizedArr = [
            "global" => trans("backend/global"),

            "modals" => [
                "areyousure" => trans("backend/modals.global.areyousure"),
                "editorcomponent_switch" => trans("backend/modals.global.editorcomponent_switch"),

                "deletePage_title" => trans("backend/modals.global.deletePage_title"),
                "deletePage_body" => trans("backend/modals.global.deletePage_body"),

                "deleteLanguage_title" => trans("backend/modals.global.deleteLanguage_title"),
                "deleteLanguage_body" => trans("backend/modals.global.deleteLanguage_body"),

                "btn_cancel" => trans("backend/modals.global.btn_cancel"),
                "btn_switch" => trans("backend/modals.global.btn_switch"),
                "btn_toggle" => trans("backend/modals.global.btn_toggle"),
                "btn_create" => trans("backend/modals.global.btn_create"),
                "btn_delete" => trans("backend/modals.global.btn_delete")
            ],

            "others" => trans("backend/others"),

            "EditorComponent" => [
                "label_rootpage" => trans("backend/others.label_rootpage"),
                "toggleHamburger" => trans("backend/others.EditorComponent.toggleHamburger"),

                "SEO" => trans("backend/others.EditorComponent.SEO")
            ],

            "modules" => [
                "dashboard" => trans("backend/modules.dashboard.title"),
                "pages" => trans("backend/modules.pages.title"),
                "models" => trans("backend/modules.models.title"),
                "filelist" => trans("backend/modules.filelist.title"),
                "languages" => trans("backend/modules.languages.title"),
                "extensions" => trans("backend/modules.extensions.title"),
                "notifications" => trans("backend/modules.notifications.title"),
                "system" => trans("backend/modules.system.title"),
                "be_users" => trans("backend/modules.be_users.title")
            ],

            "permissions_msgs" => [
                "modal_single_permission_info" => trans("backend/permissions_msgs.modal_single_permission_info"),
            ],

            "permissions" => [
                "PAGES_CREATE" => trans("backend/permissions.pages.create"),
                "PAGES_EDIT" => trans("backend/permissions.pages.edit"),
                "PAGES_DELETE" => trans("backend/permissions.pages.delete")
            ]
        ];

        return json_encode($locallizedArr);
    }
}
