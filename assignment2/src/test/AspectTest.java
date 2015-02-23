package test;

public class AspectTest {

	public static void main(String[] args) {
		AspectTest at = new AspectTest();
		at.testInt(1);
		at.testString("foo");
	}

	public void testInt(int i) {
		System.out.println("testInt()");
	}
	
	public void testString(String s) {
		System.out.println("testString()");
	}

}
