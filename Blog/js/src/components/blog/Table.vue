<template>
  <div class="dashboard">
    <h1>Dashboard</h1>
    <table class="data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Order</th>
          <th>Customer</th>
          <th>Date</th>
          <th>Quantity</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Add your table rows with data here -->
        <tr>
          <td>1</td>
          <td>Order 123</td>
          <td>John Doe</td>
          <td>2023-09-16</td>
          <td>5</td>
          <td>$100.00</td>
          <td>Delivered</td>
          <td>
            <button class="action-button" @click="toggleDropdown">:</button>
            <div class="action-dropdown" v-if="dropdownVisible">
              <button class="view-button">View</button>
              <button class="delete-button">Delete</button>
              <button class="update-button">Update</button>
            </div>
          </td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
    <div class="mobile-card" v-if="isMobile">
  <div class="card">
    <div class="card-header">
      <h2>Order 123</h2>
      <p>Customer: John Doe</p>
    </div>
    <div class="card-body">
      <p>Date: 2023-09-16</p>
      <p>Quantity: 5</p>
      <p>Amount: $100.00</p>
      <p>Status: Delivered</p>
    </div>
    <div class="card-footer">
      <button class="view-button">View</button>
      <button class="delete-button">Delete</button>
      <button class="update-button">Update</button>
    </div>
  </div>
</div>
  </div>

  
</template>

<script>
export default {
  data() {
    return {
      isMobile: false,
      dropdownVisible: false, // Add this to track dropdown visibility
    };
  },
  mounted() {
    // Check if the screen width is less than 480px (phone size)
    if (window.innerWidth < 480) {
      this.isMobile = true;
    }

    // Add a resize event listener to toggle between table and card view
    window.addEventListener('resize', this.toggleView);
  },
  methods: {
    toggleView() {
      if (window.innerWidth < 480) {
        this.isMobile = true;
      } else {
        this.isMobile = false;
      }
    },
    toggleDropdown() {
      this.dropdownVisible = !this.dropdownVisible; // Toggle dropdown visibility
    },
  },
  beforeDestroy() {
    // Remove the resize event listener to prevent memory leaks
    window.removeEventListener('resize', this.toggleView);
  },
};
</script>

<style scoped>
/* Shared styles for all devices */
.dashboard {
  margin: 20px auto; /* Center the dashboard */
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #262a2e;
  max-width: 100%; /* Ensure the table or card doesn't exceed the screen width */
}

.dashboard h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.data-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.data-table th,
.data-table td {
  padding: 10px;
  text-align: center; /* Center-align the content within table cells */
  border-bottom: 1px solid #ccc;
}

/* Styles for the table header and cells go here */

.mobile-card {
  display: none; /* Hide the card container by default */
  margin-top: 20px;
  background-color: #262a2e; /* Background color for the card */
  border-radius: 5px;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
}

.card-header {
  background-color: #34383c; /* Header background color */
  color: #fff; /* Header text color */
  padding: 10px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.card-body {
  padding: 20px;
}

.card-footer {
  background-color: #262a2e; /* Footer background color */
  padding: 10px;
  text-align: right;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.view-button,.delete-button,.update-button,.action-button {
  padding: 5px 10px;
  margin: 5px;
  border: none;
  cursor: pointer;
  background-color: #d12667;
}

/* Responsive styles */
@media (max-width: 480px) {
  /* Styles for screens smaller than 480px (phones) */
  .data-table {
    display: none; /* Hide the table on small screens */
  }

  .mobile-card {
    display: block; /* Display the card container on small screens */
  }

  /* Additional styles for card content go here */
}
</style>

