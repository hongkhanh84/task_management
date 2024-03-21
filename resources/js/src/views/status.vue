<template>
    <div class="panel">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Statuses</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="editUser()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white" class="w-5 h-5 ltr:mr-2 rtl:ml-2"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                    stroke="#1C274C" stroke-width="1.5" />
                                <path
                                    d="M7 14L9.29289 11.7071C9.68342 11.3166 10.3166 11.3166 10.7071 11.7071L12.2929 13.2929C12.6834 13.6834 13.3166 13.6834 13.7071 13.2929L17 10M17 10V12.5M17 10H14.5"
                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Add Status
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 panel p-0 border-0 overflow-hidden">
            <template v-if="displayType === 'list'">
                <div class="table-responsive">
                    <table class="table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Decription</th>
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="contact in filterdContactsList" :key="contact.id">
                                <tr>
                                    <td>
                                        <div class="flex items-center w-max">
                                            <div>{{ contact.id }}</div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap">{{ contact.name }}</td>
                                    <td class="whitespace-nowrap">{{ contact.description }}</td>
                                    <td>
                                        <div class="flex gap-4 items-center justify-center">
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                @click="editUser(contact)">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                @click="deleteUser(contact)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </template>
        </div>

        <!-- add contact modal -->
        <TransitionRoot appear :show="addContactModal" as="template">
            <Dialog as="div" @close="addContactModal = false" class="relative z-[51]">
                <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0"
                    enter-to="opacity-100" leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-[black]/60" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center px-4 py-8">
                        <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100" leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100" leave-to="opacity-0 scale-95">
                            <DialogPanel
                                class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg text-black dark:text-white-dark">
                                <button type="button"
                                    class="absolute top-4 ltr:right-4 rtl:left-4 text-gray-400 hover:text-gray-800 dark:hover:text-gray-600 outline-none"
                                    @click="addContactModal = false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <div
                                    class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">
                                    {{ params.id ? 'Edit Status' : 'Add Status' }}
                                </div>
                                <div class="p-5">
                                    <form @submit.prevent="saveUser">
                                        <div class="mb-5">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" placeholder="Enter Name" class="form-input"
                                                v-model="params.name" />
                                        </div>
                                        <div class="mb-5">
                                            <label for="address">Description</label>
                                            <textarea id="address" rows="3" placeholder="Enter Address"
                                                class="form-textarea resize-none min-h-[130px]"
                                                v-model="params.description"></textarea>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="addContactModal = false">Cancel</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">
                                                {{ params.id ? 'Update' : 'Add' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </div>
</template>
<script lang="ts" setup>
    import { ref, onMounted } from 'vue';
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogOverlay } from '@headlessui/vue';
    import Swal from 'sweetalert2';
    import { useMeta } from '@/composables/use-meta';
    useMeta({ title: 'Statuses' });

    const defaultParams = ref({
        id: null,
        name: '',
        description: '',
    });
    const displayType = ref('list');
    const addContactModal = ref(false);
    const params = ref(JSON.parse(JSON.stringify(defaultParams.value)));
    const filterdContactsList: any = ref([]);
    const searchUser = ref('');
    const contactList = ref([]);

    onMounted(async () => {
        try {
            const response = await fetchContactsFromAPI(); 
            contactList.value = response.data; // Set the contactList to the fetched data
            searchContacts(); // Search the contacts to update the filtered list
        } catch (error) {
            console.error('Error fetching contacts:', error);
            // Handle API call errors gracefully
        }
    });
    import { useAppStore } from '@/stores/index';
    const store = useAppStore();
    import axios from 'axios';

    // Function to fetch contacts from the API
    const fetchContactsFromAPI = async () => {
        // Perform API request to fetch contacts
        // Replace the URL with your API endpoint
        const userToken = store.user_token;
        axios.defaults.headers.common['Authorization'] = `Bearer ${userToken}`;

        const response = await axios.post('/api/status/all');
        return response; // Return the JSON response
    };

    const searchContacts = () => {
        filterdContactsList.value = contactList.value.filter((d) => d.name.toLowerCase().includes(searchUser.value.toLowerCase()));
    };

    const editUser = (user: any = null) => {
        params.value = JSON.parse(JSON.stringify(defaultParams.value));
        if (user) {
            params.value = JSON.parse(JSON.stringify(user));
        }

        addContactModal.value = true;
    };

const saveUser = async () => {
    try {
        if (!params.value.name) {
            showMessage('Name is required.', 'error');
            return;
        }

        const userFormData = {
            name: params.value.name,
            description: params.value.description
        };

        if (params.value.id) {
            // Update existing user
            await updateUser(params.value.id, userFormData);
        } else {
            // Add new user
            await addUser(userFormData);
        }

    
        addContactModal.value = false;
    } catch (error) {
        console.error('Error saving user:', error);
        showMessage('Failed to save user. Please try again later.', 'error');
    }
};

const updateUser = async (userId, userData) => {
    //const response = await axios.put(`/api/user/${userId}`, userData);
};

const addUser = async (userData) => {
    const response = await axios.post('/api/status/add', userData);
    searchContacts();
    showMessage('User has been saved successfully.');
};

    const deleteUser = (user: any = null) => {
        contactList.value = contactList.value.filter((d) => d.id != user.id);
        searchContacts();
        showMessage('User has been deleted successfully.');
    };

    const showMessage = (msg = '', type = 'success') => {
        const toast: any = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            customClass: { container: 'toast' },
        });
        toast.fire({
            icon: type,
            title: msg,
            padding: '10px 20px',
        });
    };
</script>
