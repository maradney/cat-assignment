<template>
  <div>
    <li class="nav-item dropdown no-arrow mx-1">
      <a
        class="nav-link dropdown-toggle"
        href="#"
        id="alertsDropdown"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">{{ unseen_notifications_count }}</span>
      </a>
      <!-- Dropdown - Alerts -->
      <div
        class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown"
      >
        <h6 class="dropdown-header">Exams notifications</h6>
        <a
          class="dropdown-item d-flex align-items-center"
          href="#"
          v-for="(notification, index) in notifications"
          :key="index"
        >
          <div class="mr-3">
            <div class="icon-circle bg-primary">
              <i class="fas fa-file-alt text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">{{ notification.created_at }}</div>
            <span class="font-weight-bold">{{ notification.message }}</span>
          </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="#">Show all grades</a>
      </div>
    </li>
  </div>
</template>

<script>
export default {
  props: ["notifications", "unseen_notifications_count"],
  mounted() {
    Echo.channel("notifications").listen("examtaken", (e) => {
      console.log("new message!");
      this.notifications.push({
        message: e.notification,
        user: e.user,
      });
    });
  },
  created() {},
};
</script>
