<template>
    <breeze-authenticated-layout>
        <template #header>
            <Heading>
                Departments
            </Heading>
        </template>


        <div class="flex items-center justify-end mb-6">
            <AnchorLink :href="route('departments.create')">Add Department</AnchorLink>
        </div>
        <Table>
            <template #header>
                <TableData @click="sortColumn('id')" :sortHeader="true" field="id" :sortby=sortby :sort=sort>Id
                </TableData>
                <TableData @click="sortColumn('name')" :sortHeader="true" field="name" :sortby=sortby :sort=sort>Name
                </TableData>
                <TableData @click="sortColumn('email')" :sortHeader="true" field="email" :sortby=sortby :sort=sort>Email
                </TableData>
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
import Heading from '@/Components/Heading'

export default {

    components: {
        BreezeAuthenticatedLayout,
        TableData,
        Table,
        Pagination,
        AnchorLink,
        Heading
    },
    props: {
        departments: Object,
        sortby: String,
        sort: String
    },
    methods: {
        destroy(id) {
            if (confirm("Do you really want to delete this department?")) {
                this.$inertia.delete(route('departments.destroy', id), { preserveScroll: false, preserveState: false });
            }
        },
        employees(department_id) {
            this.$inertia.visit(route('employees.index'), {
                method: "get",
                data: { department_id: department_id }
            });
            // this.$inertia.get(route('employees.index'), { department_id: department_id });
        },
        sortColumn(col) {
            var sort = this.sort;
            if (col == this.sortby) {
                if (this.sort == 'asc') {
                    sort = 'desc';
                } else {
                    sort = 'asc';
                }
            }

            this.$inertia.get(route('departments.index'), {
                'sortby': col, sort: sort, page: this.departments.current_page
            }, { preserveScroll: true })
        }
    }
}
</script>
