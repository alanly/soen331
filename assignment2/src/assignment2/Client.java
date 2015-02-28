package assignment2;

import assignment2.bintree.base.BinTree;
import assignment2.bintree.base.IBinTree;
import assignment2.bintree.other.BalancedBinTree;

public class Client {

	public static void main(String[] args) {
		Client c = new Client();
		
		// Test BinTree (Binary Tree)
		if (c.testBinaryTree()) {
			System.out.println("BinTree Passed.");
		}
		
		// Test BalancedBinTree (Balanced Binary Tree)
		if (c.testBalancedBinaryTree()) {
			System.out.println("BalancedBinTree Passed.");
		}
	}
	
	private boolean testBinaryTree() {
		BinTree[] bt = new BinTree[5];
		
		for (int i = 0; i < 5; ++i) {
			// Create 5 new instances, identified from 0..4
			bt[i] = new BinTree(i);
			
			// Contract 1: Ensure that the newly created instance does not have a height of zero.
			assert(bt[i].height() != 0);
			
			// Contract 3: Ensure newly created instance does not have a left or right node.
			assert(! bt[i].hasLeft());
			assert(! bt[i].hasRight());
		}
		
		// Contract 4: setLeft rejects null parameter.
		//bt[0].setLeft(null); // Should error out.
		bt[0].setLeft(bt[1]);
		
		// Contract 6: left is no longer null
		assert(bt[0].getLeft() != null);
		
		// Contract 7: left is the node we expect.
		assert(bt[0].getLeft() == bt[1]);
		
		// Constract 8: setRight rejects null parameter.
		//bt[0].setRight(null); // Should error out.
		bt[0].setRight(bt[2]);
		
		// Contract 10: right is no longer null
		assert(bt[0].getRight() != null);
		
		// Contract 11: right is the node we expect
		assert(bt[0].getRight() == bt[2]);
		
		// Contract 5: setLeft will not overwrite existing node.
		//bt[0].setLeft(bt[3]); // Should error out.
		
		// Contract 9: setRight will not overwrite existing node.
		//bt[0].setRight(bt[4]); // Should error out.
		
		return true;
	}
	
	private boolean testBalancedBinaryTree() {
		BalancedBinTree[] bt = new BalancedBinTree[6];
		
		for (int i = 0; i < 6; ++i) {
			bt[i] = new BalancedBinTree(i);
			assert bt[i].isBalanced();
		}
		
		/**
		 * Should inherit the invariant of the parent class. Thus,
		 * the height shouldn't be zero.
		 */
		for (BalancedBinTree t : bt) {
			assert t.height() > 0;
		}
		
		bt[0].setLeft(bt[1]);
		
		// Should still be balanced.
		assert bt[0].isBalanced();
		
		bt[0].setRight(bt[2]);
		
		// Should still be balanced.
		assert bt[0].isBalanced();
		
		bt[0].getLeft().setLeft(bt[3]);
		
		// Should still be balanced.
		assert bt[0].isBalanced();
		
		// Now we try to unbalance it by adding more to one side of the tree.
		bt[0].getLeft().getLeft().setLeft(bt[4]);
		
		// The addition should not have been allowed, thus we should still be balanced.
		assert bt[0].isBalanced();
		
		return true;
	}
	
	private boolean testFullBinaryTree() {
		return true;
	}
	
	private boolean testPerfectBinaryTree() {
		return true;
	}

}
