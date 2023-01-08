<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Departments
            </h2>
        </template>


        <div class="flex items-center justify-end mb-6">
            <AnchorLink :href="route('departments.create')">Add Department</AnchorLink>
        </div>
        <Table>
            <template #header>
                <TableData>Id</TableData>
                <TableData>Name</TableData>
                <TableData>Email</TableData>
                <TableData>Phone</TableData>
                <TableData>Actions</TableData>
            </template>
            <tr v-for="department in departments.data" :key="department.id" class="hover:bg-gray-200">
                <TableData>{{ department.id }}</TableData>
                <TableData>{{ department.name }}</TableData>
                <TableData>{{ department.email }}</TableData>
                <TableData>{{ department.phone }}</TableData>
                <TableData>
                    <AnchorLink mode="edit" :href="route('departments.edit', department.id)">Edit</AnchorLink>
                    <AnchorLink mode="delete" @click="destroy(department.id)">Delete</AnchorLink>
                    <!-- Get the list of employees in the employee page -->
                    <AnchorLink mode="view" @click="employees(department.id)">View</AnchorLink>
                </TableData>
            </tr>
        </Table>

        <Pagination :links="departments.links" />

    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import TableData from '@/Components/TableData'
import Table from '@/Components/Table'
import Pagination from '@/Components/Pagination'
import AnchorLink from '@/Components/AnchorLink'

export default {

    components: {
        BreezeAuthenticatedLayout,
        TableData,
        Table,
        Pagination,
        AnchorLink
    },
    props: {
        departments: Object,
    },
    methods: {
        destroy(id) {
            if (confirm("Do you really want to delete this department?")) {
                this.$inertia.delete(route('departments.destroy', id));
            }
        },
        employees(department_id) {
            this.$inertia.visit(route('employees.index'), {
                method: "get",
                data: { department_id: department_id }
            });
            // this.$inertia.get(route('employees.index'), { department_id: department_id });
        }
    }
}
</script>
