Centauri.Callbacks.EditRecordCallback = (data) => {
    Centauri.Components.EditorComponent("show", {
        id: "EditBeRole",
        title: "Backend Roles » Editing '" + data.name + "'",

        form: [
            {
                id: "uid",
                label: "UID",
                type: "text",
                value: data.uid,
                hidden: true
            },

            {
                id: "hidden",
                type: "custom",
                custom: "switch",

                data: {
                    label: "Hidden",
                    isChecked: data.hidden
                }
            },

            {
                id: "name",
                label: "Name",
                type: "text",
                value: data.name
            },

            {
                id: "permissions",
                type: "custom",
                custom: "tags",

                data: {
                    label: "Permissions",
                    tagsLabel: "identifier",
                    tagValue: "uid",
                    tags: data.__permissions,
                    additionalParentData: "data-uid='" + data.uid + "'"
                }
            }
        ],

        callbacks: {
            htmlAppended: () => {
                Centauri.Callbacks.EditorComponent.TagsCallback();
            },

            save: (formData) => {
                formData = JSON.parse(formData);

                Centauri.fn.Ajax(
                    "BackendRole",
                    "update",

                    {
                        uid: formData.uid,
                        name: formData.name,
                        hidden: formData.hidden
                    },

                    {
                        success: (data) => {
                            if(data) {
                                Centauri.Notify("success", "User-Update", formData.name + " was successful!");

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
};
