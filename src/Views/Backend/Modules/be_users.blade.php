@extends("Centauri::Backend.Layouts.be_module")

@section("moduleid"){{"be_users"}}@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                @section("headertitle") Backend Users @endsection

                <div class="table-wrapper">
                    <table id="be_users" class="table table-dark table-hover ci-bs-2">
                        <thead class="thead-dark">
                            <tr>
                                <th>
                                    Firstname
                                </th>

                                <th>
                                    Lastname
                                </th>

                                <th>
                                    Backend Name
                                </th>

                                <th>
                                    Roles
                                </th>

                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data["beusers"] as $beuser)
                                <tr data-uid="{{ $beuser->uid }}">
                                    <td>
                                        {{ $beuser->firstname }}
                                    </td>

                                    <td>
                                        {{ $beuser->lastname }}
                                    </td>

                                    <td>
                                        {{ $beuser->username }}
                                    </td>

                                    <td>
                                        <div class="row be-users-row m-0">
                                            @foreach($beuser->getRoles() as $role)
                                                @if(isset(centauriconfig("be_roles")[$role->name]))
                                                    @php
                                                        $beRoleConfig = centauriconfig("be_roles")[$role->name];
                                                        $jsonBeRoleConfig = json_encode($beRoleConfig);

                                                        $additionalClasses = (isset($beRoleConfig["additionalClasses"]) ? " " . $beRoleConfig["additionalClasses"] : "");
                                                        $overwriteClass = (isset($beRoleConfig["overwriteClass"]) ? $beRoleConfig["overwriteClass"] : "btn waves-effect waves-light p-2" . $additionalClasses);
                                                    @endphp

                                                    <button 
                                                        class="{{ $overwriteClass }}"
                                                        data-uid="{{ $role->uid }}"
                                                        data-roleconfig="{{ $jsonBeRoleConfig }}"
                                                        onclick="Centauri.fn.__editRecord(
                                                            event,
                                                            this,
                                                            'uid',
                                                            'BackendRole',
                                                            'editInEditorComponent'
                                                        )"
                                                    >
                                                        {{ $role->name }}
                                                    </button>
                                                @else
                                                    <button 
                                                        class="btn waves-effect waves-light p-2"
                                                        data-uid="{{ $role->uid }}"
                                                        onclick="Centauri.fn.__editRecord(
                                                            event,
                                                            this,
                                                            'uid',
                                                            'BackendRole',
                                                            'editInEditorComponent'
                                                        )"
                                                    >
                                                        {{ $role->name }}
                                                    </button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>

                                    <td>
                                        <div class="actions">
                                            <div class="d-block d-lg-none action btn btn-primary p-2 waves-effect waves-light" data-action="actions-trigger">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </div>

                                            <div class="d-none d-lg-flex">
                                                <div class="action btn btn-primary mt-0 p-2 waves-effect waves-light" data-action="edit">
                                                    <i class="fas fa-pen fa-lg"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="module_buttons" class="col-12 text-right">
                <button class="btn btn-primary btn-floating fa-lg waves-effect" data-button-type="create">
                    <i class="fas fa-plus"></i>
                </button>

                <button class="btn btn-info btn-floating fa-lg waves-effect" data-button-type="refresh">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>
    </div>
@endsection
