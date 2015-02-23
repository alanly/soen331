package test;

public aspect Aspect {

	pointcut testInt():
		call (void test.AspectTest.testInt(*));
	
	before(): testInt() {
		System.out.println("before testInt()");
	}
	
	after(): testInt() {
		System.out.println("after testInt()");
	}
	
	pointcut testString():
		call (void test.AspectTest.testString(*));
	
	before(): testString() {
		System.out.println("before testString()");
	}
	
	after(): testString() {
		System.out.println("after testString()");
	}
	
}
