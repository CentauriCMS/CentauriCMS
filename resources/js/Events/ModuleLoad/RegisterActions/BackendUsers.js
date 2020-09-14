Centauri.Events.OnModuleLoadEvent.BackendUsers.RegisterActions = () => {
    let $action = $("table#be_users .actions .action");

    $action.on("click", this, function() {
        $tr = $(this).parent().parent().parent().parent();

        let action = $(this).attr("data-action");

        if(action == "actions-trigger") {
            $(this).toggleClass("active");
        }

        if(action == "edit") {
            Centauri.fn.Ajax(
                "BackendUser",
                "findByUid",

                {
                    uid: 1
                },

                {
                    success: (data) => {
                        let beUser = JSON.parse(data);

                        Centauri.Components.EditorComponent("show", {
                            id: "EditBeUser",
                            title: "Backend Users » Editing '" + beUser.username + "'",

                            form: [
                                {
                                    id: "uid",
                                    label: "UID",
                                    type: "text",
                                    value: beUser.uid,
                                    hidden: true
                                },

                                {
                                    id: "hidden",
                                    type: "custom",
                                    custom: "switch",

                                    data: {
                                        label: "Hidden",
                                        isChecked: beUser.hidden
                                    }
                                },

                                {
                                    id: "username",
                                    label: "Username",
                                    type: "text",
                                    value: beUser.username
                                },

                                {
                                    id: "firstname",
                                    label: "Firstname",
                                    type: "text",
                                    value: beUser.firstname
                                },

                                {
                                    id: "lastname",
                                    label: "Lastname",
                                    type: "text",
                                    value: beUser.lastname
                                },

                                {
                                    id: "roles",
                                    type: "custom",
                                    custom: "tags",

                                    data: {
                                        label: "Roles",
                                        tagsLabel: "name",
                                        tagValue: "uid",
                                        tags: beUser.__roles,
                                        additionalParentData: "data-uid='" + beUser.uid + "'"
                                    }
                                }
                            ],

                            callbacks: {
                                htmlAppended: () => {
                                    Centauri.Callbacks.EditorComponent.TagsCallback();

                                    $("#tags-roles > .btn", $editor).each(function() {
                                        let uid = $(this).data("uid");

                                        if(Centauri.isNotUndefined(uid)) {
                                            let roleConfig = $(".be-users-row button[data-uid='" + uid + "']").data("roleconfig");

                                            if(Centauri.isNotUndefined(roleConfig.additionalClasses)) {
                                                $(this).addClass(roleConfig.additionalClasses);
                                            }

                                            if(Centauri.isNotUndefined(roleConfig.overwriteClass)) {
                                                $(this).attr("class", roleConfig.overwriteClass);
                                            }
                                        }
                                    });
                                },

                                save: (formData) => {
                                    formData = JSON.parse(formData);

                                    Centauri.fn.Ajax(
                                        "BackendUser",
                                        "update",

                                        {
                                            formData: formData
                                        },

                                        {
                                            success: (data) => {
                                                if(data) {
                                                    Centauri.Notify("success", "User-Update", formData.username + " was successful!");

                                                    Centauri.Components.ModulesComponent({
                                                        type: "load",
                                                        module: Centauri.Module
                                                    });
                                                } else {
                                                    Centauri.Notify("error", "User-Update", "An error occurred while updating this user's data!")
                                                }
                                            }
                                        }
                                    );
                                }
                            }
                        });
                    }
                }
            );
        }
    });
};
