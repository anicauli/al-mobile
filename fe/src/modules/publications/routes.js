import PublicationEdit from "@/modules/publications/PublicationEdit.vue";
import PublicationList from "@/modules/publications/PublicationList.vue";

export default [
  {
    path: '',
    name: 'publication-list',
    component: PublicationList
  },
  {
    path: 'create',
    name: 'publication-create',
    component: PublicationEdit,
  },
  {
    path: ':id',
    name: 'publication-edit',
    component: PublicationEdit,
  },
];
