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
                    <AnchorLink :href="route('departments.edit', department.id)">Edit</AnchorLink>

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
}
</script>
