<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/" class="nav-item nav-link">Overview</router-link>
                        <router-link exact-active-class="active" to="/contact/add" class="nav-item nav-link">Add new contact</router-link>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
export default {}
</script>
