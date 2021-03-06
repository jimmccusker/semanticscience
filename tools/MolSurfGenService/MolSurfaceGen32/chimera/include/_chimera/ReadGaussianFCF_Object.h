#ifndef chimera_ReadGaussianFCF_object_h
# define chimera_ReadGaussianFCF_object_h
# if defined(_MSC_VER) && (_MSC_VER >= 1020)
#  pragma once
# endif

# define PY_SSIZE_T_CLEAN 1
#include <Python.h>
# include "Mol.h"
#include <otf/WrapPy2.h>
namespace chimera {

CHIMERA_IMEX extern PyTypeObject ReadGaussianFCF_objectType;

struct ReadGaussianFCF_object: public PyObject {
	PyObject* _inst_dict;
	otf::WrapPyObj* _inst_data;
	ReadGaussianFCF* _inst() { return static_cast<ReadGaussianFCF*>(_inst_data); }
	PyObject* _weaklist;
};

CHIMERA_IMEX extern ReadGaussianFCF* getInst(ReadGaussianFCF_object* self);

} // namespace chimera

namespace otf {

template <> inline bool
WrapPyType<chimera::ReadGaussianFCF>::check(PyObject* _o, bool noneOk)
{
	if (noneOk && _o == Py_None)
		return true;
	return PyObject_TypeCheck(_o, &chimera::ReadGaussianFCF_objectType);
}

template <> CHIMERA_IMEX PyObject* pyObject(chimera::ReadGaussianFCF* _o);
template <> inline PyObject* pyObject(chimera::ReadGaussianFCF const* _o) { return pyObject(const_cast<chimera::ReadGaussianFCF*>(_o)); }

} // namespace otf

#endif
