<template>
    <a :href="seeNotificationUrl" @click="markNotificationAsRead" class="text-secondary mt-2 mr-3 text-decoration-none">
        <span>Notifications</span>
        <span class="badge badge-primary" v-if="totalUnreadNotification">{{ totalUnreadNotification }}</span>
        <span class="badge badge-secondary" v-else>{{ totalUnreadNotification }}</span>
    </a>
</template>

<script>
    export default {
        props:['unreads', 'userid'],
        data() {
            return {
                unreadNotifications: this.unreads,
                seeNotificationUrl: "/admin/users/notifications",
                totalUnreadNotification: this.unreads.length
            }
        },
        methods: {
            markNotificationAsRead() {
                if (this.totalUnreadNotification) {
                    axios.get('/admin/users/notifications/markAsRead');
                    this.totalUnreadNotification = 0;
                }
            },
        },
        mounted() {
            Notification.requestPermission().then(function (result) {
            });

            Echo.private('App.User.'+this.userid)
                .notification((notify) => {
                let newUnreadNotification = {data: {discussion: notify.discussion}};
                console.log(notify.discussion);
                this.unreadNotifications.push(newUnreadNotification);
                this.totalUnreadNotification++;
            });
        },
    }
</script>
