<main>
    <section site="role" class="main-container
  <?php
    if (isset($show)) {
        echo $show;
    }
    ?>
">
        <div class="decentralize-title">
            <h3 class="title-text">phần quyền tài khoản</h3>
            <a id="button-decentralize-add-accout" href="http://localhost/admin/addAccount">
                <button type="button" class="button-action-1 add"><i class="fa-solid fa-user-plus"></i></button>
            </a>
        </div>

        <div class="fui-table-ui-1-2 table-accordion">
            <table class="fold-table">
                <thead>
                    <tr>

                        <th></th>
                        <th>email</th>
                        <th>số điện thoại</th>

                        <th>quyền</th>
                    </tr>
                </thead>
                <tbody id="rootTableAccount">
                    <?php

                    use controllers\UserController;

                    $getAccount = new UserController();
                    $listAccount = $getAccount->adminGetAccount();
                    $index = 0;
                    foreach ($listAccount as $key => $value) :
                        $roles = $value["roles"];

                    ?>
                        <tr class="view">


                            <td class="pcs"><?php echo $index++ ?></td>
                            <td class="cur"><?php echo $value["user"]["email"] ?></td>
                            <td class="per"><?php echo $value["user"]["phone"] ?></td>
                            <td class="td-btn-wrapper">
                                <button class="td-btn-accordion">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                    </svg>
                                </button>
                                <?php
                                if (strcmp($value["user"]["email"], "mark@gmail.com") !== 0) {
                                ?>
                                    <button class="button-action-1 edit" id="button-decentralize-edit" onclick="dispatch('admin/edit/account',this)" data-account=" <?php echo $value["user"]["user_id"] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button data-account=" <?php echo $value["user"]["user_id"] ?>" class="button-action-1 delete-btn" onclick="dispatch('admin/delete/account/popup',1,this )" id="button-decentralize-delete">
                                        <i class="fa-regular fa-trash-can"></i></button>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr class="fold">
                            <td colspan="5">
                                <div class="fold-content-wrap">
                                    <div class="fold-content">
                                        <h3>bảng quyền chi tiết</h3>

                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>tên nhóm quyền</th>
                                                    <th>xem</th>
                                                    <th>sữa</th>
                                                    <th>xóa</th>
                                                    <th>thêm</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($roles as $key => $data) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $data["role"]["service"]; ?></td>
                                                        <?php
                                                        if ($data["permission"]["view"] === 1) :
                                                        ?>
                                                            <td><input type="checkbox" name="" id="" checked class="pointer-none ">

                                                            </td>
                                                        <?php else : ?>
                                                            <td><input type="checkbox" name="" id="" class="pointer-none "></td>
                                                        <?php endif; ?>
                                                        <?php
                                                        if ($data["permission"]["action_update"] === 1) :
                                                        ?>
                                                            <td><input type="checkbox" name="" id="" checked class="pointer-none ">

                                                            </td>
                                                        <?php else : ?>
                                                            <td><input type="checkbox" name="" id="" class="pointer-none "></td>
                                                        <?php endif; ?>
                                                        <?php
                                                        if ($data["permission"]["action_delete"] === 1) :
                                                        ?>
                                                            <td><input type="checkbox" name="" id="" checked class="pointer-none ">

                                                            </td>
                                                        <?php else : ?>
                                                            <td><input type="checkbox" name="" id="" class="pointer-none "></td>
                                                        <?php endif; ?>
                                                        <?php
                                                        if ($data["permission"]["action_create"] === 1) :
                                                        ?>
                                                            <td><input type="checkbox" name="" id="" checked class="pointer-none ">

                                                            </td>
                                                        <?php else : ?>
                                                            <td><input type="checkbox" name="" id="" class="pointer-none "></td>
                                                        <?php endif; ?>

                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php
                    endforeach;
                    ?>

                </tbody>
            </table>
        </div>
        <script>

        </script>
    </section>
</main>