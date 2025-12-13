import PublicationList from "@/modules/publications/cars/CarsList.vue";
import CarsEdit from "@/modules/publications/cars/CarsEdit.vue";

export default [
  {
    path: 'cars',
    name: 'cars-list',
    component: PublicationList
  },
  {
    path: 'cars/create',
    name: 'cars-create',
    component: CarsEdit,
  },
  {
    path: 'cars/:id/edit',
    name: 'cars-edit',
    component: CarsEdit,
  },
];
