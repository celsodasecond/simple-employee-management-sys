<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Employees
            </h2>
        </template>


        <div class="flex items-center justify-end mb-6">
            <AnchorLink :href="route('employees.create')">Add New Employee</AnchorLink>
        </div>
        <Table>
            <template #header>
                <TableData>Id</TableData>
                <TableData>Name</TableData>
                <TableData>Department</TableData>
                <TableData>Email</TableData>
                <TableData>Actions</TableData>
            </template>
            <tr v-for="employee in employees.data" :key="employee.id" class="hover:bg-gray-200">
                <TableData>{{ employee.id }}</TableData>
                <TableData>{{ employee.name }}</TableData>
                <TableData>{{ employee.department }}</TableData>
                <TableData>{{ employee.email }}</TableData>
                <TableData>
                    <AnchorLink mode="edit" :href="route('employees.edit', employee.id)">Edit</AnchorLink>
                    <AnchorLink mode="delete" @click="destroy(employee.id)">Delete</AnchorLink>
                </TableData>
            </tr>
        </Table>

        <Pagination :links="employees.links" />

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
        employees: Object,
    },
    methods: {
        destroy(id) {
            if (confirm("Do you really want to delete this department?")) {
                this.$inertia.delete(route('employees.destroy', id));
            }
        }
    }
}
</script>
