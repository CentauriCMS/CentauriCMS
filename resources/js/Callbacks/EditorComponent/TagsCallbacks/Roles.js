Centauri.Callbacks.EditorComponent.TagsCallbacks.Roles = (tagEl) => {
    let uid = $(tagEl).data("uid");

    Centauri.fn.Ajax(
        "BackendRole",
        "findByUid",

        {
            uid: uid
        },

        {
            success: (data) => {
                data = JSON.parse(data);

                let name = data.name;

                Centauri.fn.Modal(
                    "Backend Role » <b>" + name + "</b>",
                    "<p class='mb-0'>" + name + " CENTAURI__TRANS TEXT OKKKKKKKKK OMEGAKEK</p>",

                    {
                        id: "role_" + name,

                        close: {
                            label: "Cancel",
                            class: "warning"
                        },

                        save: {
                            label: "Remove",
                            class: "danger"
                        }
                    },

                    {
                        save() {
                            let $tagsEl = $(tagEl).parent();
                            let userUid = $tagsEl.data("uid");

                            Centauri.fn.Ajax(
                                "BackendUser",
                                "removeRoleByUid",

                                {
                                    userUid: userUid,
                                    roleUid: uid
                                },

                                {
                                    success: (data) => {
                                        Centauri.Components.EditorComponent("clear");

                                        $("table#be_users tr[data-uid='" + userUid + "'] .action[data-action='edit']").trigger("click");
                                    }
                                }
                            );
                        }
                    }
                );
            }
        }
    );
};

Centauri.Callbacks.EditorComponent.TagsCallbacks.Roles.Adder = (userUid) => {
    Centauri.fn.Ajax(
        "BackendUser",
        "findByUid",

        {
            uid: userUid
        },

        {
            success: (data) => {
                let beUser = JSON.parse(data);
                let beUserRoleUids = JSON.parse(beUser.roles);

                if(Centauri.isNull(beUserRoleUids)) {
                    beUserRoleUids = [];
                }

                Centauri.fn.Ajax(
                    "BackendRole",
                    "list",

                    {
                        uid: userUid
                    },

                    {
                        success: (data) => {
                            let beRoles = JSON.parse(data);
                            let html = "";

                            beRoles.forEach(beRole => {
                                let roleText = "kekoooo";//Centauri__trans.roles[beRole.name];
                                let isChecked = false;
                                let additionalHTML = "";

                                if(beUserRoleUids.includes(beRole.uid)) {
                                    isChecked = true;
                                }

                                if(Centauri.isNotUndefined(roleText)) {
                                    additionalHTML = "<p>" + roleText + "</p>";
                                }

                                html += Centauri.Utility.EditorUtility.getCustomHTMLByType({
                                    id: "be_role-" + beRole.uid,
                                    custom: "switch",

                                    data: {
                                        label: beRole.name,
                                        isChecked: isChecked,
                                        additionalHTML: additionalHTML
                                    }
                                });
                            });

                            Centauri.fn.Modal(
                                "Backend Users » <b>" + beUser.username + "</b> » Roles",
                                html,

                                {
                                    id: "roles_list",
                                    layout: "center",
                                    search: true,
                                    closeOnSave: false,

                                    close: {
                                        label: "Close"
                                    },

                                    save: {
                                        label: "Update",
                                        class: "primary"
                                    }
                                },

                                {
                                    save() {
                                        let roleUidsArr = [];

                                        $(".modal .modal-body .field.ci-switch").each(function() {
                                            let $input = $("input", $(this));
                                            let id = $input.attr("id");
                                            let roleUid = id.split("-")[1];
                                            let isChecked = $input.prop("checked");
                                            
                                            if(isChecked) {
                                                roleUidsArr.push(roleUid);
                                            }
                                        });

                                        Centauri.fn.Ajax(
                                            "BackendUser",
                                            "updateRolesByUids",

                                            {
                                                userUid: beUser.uid,
                                                roleUids: roleUidsArr
                                            },

                                            {
                                                success: (data) => {
                                                    if(data) {
                                                        Centauri.Notify("success", "Roles", beUser.username + "-User roles updated successfully");

                                                        Centauri.Components.EditorComponent("clear");

                                                        $("table#be_users tr[data-uid='" + beUser.uid + "'] .action[data-action='edit']").trigger("click");
                                                    } else {
                                                        Centauri.Notify("error", "Roles", "An error occurred while updating roles for this user!")
                                                    }
                                                }
                                            }
                                        );
                                    }
                                }
                            );
                        }
                    }
                );
            }
        }
    );
};
