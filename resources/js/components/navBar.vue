<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a
                    class="nav-link"
                    data-widget="pushmenu"
                    href="#"
                    role="button"
                    ><i class="fas fa-bars"></i
                ></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a
                    class="nav-link"
                    data-widget="navbar-search"
                    href="#"
                    role="button"
                >
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input
                                class="form-control form-control-navbar"
                                type="search"
                                placeholder="Search"
                                aria-label="Search"
                            />
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button
                                    class="btn btn-navbar"
                                    type="button"
                                    data-widget="navbar-search"
                                >
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item">
                <a
                    class="nav-link"
                    data-widget="fullscreen"
                    href="#"
                    role="button"
                >
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a
                    @click.prevent="localLogout"
                    class="nav-link"
                    href="#"
                    >Logout
                    <i class="mx-2 fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img
                src="/adminLteSources/dist/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: 0.8"
            />
            <span class="brand-text font-weight-light">Trusted Skills</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        src="/adminLteSources/dist/img/user2-160x160.jpg"
                        class="img-circle elevation-2"
                        alt="User Image"
                    />
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ loggedUser.user.name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input
                        class="form-control form-control-sidebar"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                    />
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <li class="nav-item">
                        <router-link class="nav-link" to="Home">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Home</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="customers">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Clients</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="prospects">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Prospects</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="rappels">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Rappels</p>
                        </router-link>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
export default {
    name: "navBar",
    computed: {
        ...mapGetters(["loggedUser"]),
    },
    methods: {
        ...mapActions(["logout"]),
        localLogout() {
            this.logout().then(() => this.$router.push("/"));
        },
    },
};
</script>

<style>
aside {
    position: relative;
}
.logoutLink {
    position: absolute;
    bottom: 0;
    margin-bottom: 20px;
    width: 100%;
}
a>.fa-sign-out-alt{
    display:flex row;
    -ms-flex-item-align: center;
}
.fa-sign-out-alt {
    font-size: 1.2em;
    align-self: baseline;
}
</style>
