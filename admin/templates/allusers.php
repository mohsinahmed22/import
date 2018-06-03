<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */
include("../includes/header.php"); ?>

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Admin Users List
                            <small></small>
                        </h2>
                        <p><a href="add.php?users=addnew" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add User</a>
                        </p>
                        <?php echo $msg;?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user->id ?></td>
                                    <td><?php echo $user->username?></td>
                                    <td><?php echo $user->first_name . $user->last_name ?> </td>
                                    <td><?php echo $user->email ?></td>
                                    <td><?php echo $user->phone ?></td>
                                    <td><?php echo $user->role ?></td>
                                    <td><?php echo $user->is_active ?></td>
                                    <td><a href="edit.php?users=<?php echo $user->id ?>">Edit</a> | <a
                                            href="users.php?delete=<?php echo $user->id ?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? include("../includes/footer.php"); ?>