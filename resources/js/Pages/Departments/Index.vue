<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Departments
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Table>
                            <template #header>
                                <TableData>Id</TableData>
                                <TableData>Name</TableData>
                                <TableData>Email</TableData>
                                <TableData>Phone</TableData>
                                <TableData>Actions</TableData>
                            </template>

                            <tr v-for="department in departments" :key="department.id" class="hover:bg-gray-200">
                                <TableData>{{ department.id }}</TableData>
                                <TableData>{{ department.name }}</TableData>
                                <TableData>{{ department.email }}</TableData>
                                <TableData>{{ department.phone }}</TableData>
                                <TableData></TableData>
                            </tr>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import TableData from '@/Components/TableData'
import Table from '@/Components/Table'

export default {
    components: {
        BreezeAuthenticatedLayout,
        TableData,
        Table
    },

    props: {
        departments: Object,
    },
}
</script>
